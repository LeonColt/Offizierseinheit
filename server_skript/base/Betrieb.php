<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Betrieb
 *
 * @author LC
 */
require_once 'Verbindung.php';
require_once 'server_skript/base/globale_variable.php';
abstract class Betrieb extends Verbindung {
    //put your code here
    protected $abfrage = NULL, $parameter = NULL, $weiter = TRUE, $anweisung = NULL,
            $zahler = NULL, $gewahlt_zahler = TRUE;
    public function __construct($pfad = standard_pfad, $sprache = standard_sprache, $host = NULL, $hafen = NULL, $daten_bank_name = NULL, $benutzername = NULL, $passwort = NULL) {
        parent::__construct($pfad, $sprache, $host, $hafen, $daten_bank_name, $benutzername, $passwort);
    }
    public final function ausfuhren($zahler = 1)
    {
        if($this->ist_token_korrigieren())
        {
            $this->zahler = $zahler;
            if($this->daten_uberprufen())
            {
                $this->vorbereiten_abfrage_und_parameter();
                if($this->variable_uberprufen())
                {
                    $this->verbinde();
                    if($this->verbindung)
                    {
                        $this->weiter = TRUE;
                        $this->verbindung->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        try
                        {
                            $this->verbindung->beginTransaction();
                            for($zahler = 0; $zahler<$this->get_zahler() && $this->weiter; $zahler++)
                            {
                                if($this->vorbereiten_anweisung($zahler))
                                {
                                    if($this->ausfuhren_anweisung($zahler))
                                    {
                                        if($this->anweisung->rowCount() > 0)
                                        {
                                            $this->erganzung($zahler);
                                        }
                                        else
                                        {
                                            $this->weiter = FALSE;
                                        }
                                    }
                                    else
                                    {
                                        $this->weiter = FALSE;
                                        throw new Exception(fehler_ausfuhren_anweisung);
                                    }
                                }
                                else
                                {
                                    $this->weiter = FALSE;
                                    throw new Exception(fehler_vorbereiten_anweisung);
                                }
                            }
                            $this->commit();
                        } catch (PDOException $ex) {
                            $this->close();
                            throw $ex;
                        } catch (Exception $ex) {
                            $this->close();
                            throw $ex;
                        }
                    }
                    else
                    {
                        throw new Exception(fehler_verbindung);
                    }
                }
                else
                {
                    throw new Exception(variable_leere);
                }
            }
            else
            {
                throw new Exception(daten_leere);
            }
        }
        else
        {
            throw new Exception(fehler_token);
        }
        $this->close();
    }
    private final function commit()
    {
        if($this->weiter)
        {
            $this->verbindung->commit();
            $this->erfolg_ausfuhren();
        }
        else
        {
            $this->verbindung->rollback();
            $this->fehler_ausfuhren();
        }
    }
    private final function ausfuhren_anweisung(&$zahler)
    {
        //echo $this->verbindung->errorInfo();
        if($this->anweisung->execute($this->parameter[$zahler]))
        {
            return true;
        }
        return false;
    }
    private final function vorbereiten_anweisung(&$zahler)
    {
        if(($this->anweisung = $this->verbindung->prepare($this->abfrage[$zahler])))
        {
            return true;
        }
        return false;
    }
    private final function variable_uberprufen()
    {
        if(isset($this->abfrage) && isset($this->parameter))
        {
            if(!empty($this->abfrage) && !empty($this->parameter))
            {
                return true;
            }
        }
        return false;
    }
    private final function get_zahler()
    {
        if($this->gewahlt_zahler)
        {
            return count($this->abfrage);
        }
        else
        {
            return $this->zahler;
        }
    }
    protected abstract function daten_uberprufen();
    protected abstract function erganzung(&$zahler);
    protected abstract function erfolg_ausfuhren();
    protected abstract function fehler_ausfuhren();
    protected abstract function vorbereiten_abfrage_und_parameter();
}
