<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bergmann
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/base/Verbindung.php';
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
abstract class Bergmann extends Verbindung {
    //put your code here
    protected $abfrage = NULL, $parameter = NULL, $ergebnis = NULL;

    public function __construct($pfad = standard_pfad, $sprache = standard_sprache, $host = NULL, $hafen = NULL, $daten_bank_name = NULL, $benutzername = NULL, $passwort = NULL) {
        parent::__construct($pfad, $sprache, $host, $hafen, $daten_bank_name, $benutzername, $passwort);
    }

    public function ausfuhren()
    {
        try
        {
            $this->ist_token_korrigieren_schnittstelle();
            $this->daten_uberprufen_schnittstelle();
            $this->vorbereiten_abfrage_und_parameter();
            $this->variable_uberprufen_schnittstelle();
            $this->verbinde();
            $this->verbindung_schnittstelle();
            $this->verbindung->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->vorbereiten_anweisung_schnittstelle();
            $this->ausfuhren_anweisung_schnittstelle();
            $this->extrakt_daten();
            $this->close();
        } catch (PDOException $ex) {
            $this->close();
            throw $ex;
        } catch (Exception $ex) {
            $this->close();
            throw $ex;
        }
    }
    
    //begin schnittstelle
    
    private final function ist_token_korrigieren_schnittstelle() {
        if(!$this->ist_token_korrigieren())
        {
            throw new Exception(fehler_token);
        }
    }

    private final function daten_uberprufen_schnittstelle() {
        if(!$this->daten_uberprufen())
        {
            throw new Exception(daten_leere);
        }
    }
    
    private final function variable_uberprufen_schnittstelle()
    {
        if(!$this->variable_uberprufen())
        {
            throw new Exception(variable_leere);
        }
    }
    private final function verbindung_schnittstelle()
    {
        if(!$this->verbindung)
        {
            throw new Exception(fehler_verbindung);
        }
    }
    
    private final function vorbereiten_anweisung_schnittstelle()
    {
        if(!$this->vorbereiten_anweisung())
        {
            throw new Exception(fehler_vorbereiten_anweisung);
        }
    }
    private final function ausfuhren_anweisung_schnittstelle()
    {
        if(!$this->ausfuhren_anweisung())
        {
            throw new Exception(fehler_ausfuhren_anweisung);
        }
    }

    //end schnittstelle
    
    
    public final function erhalten_alle_daten()
    {
        return $this->ergebnis;
    }
    private final function extrakt_daten()
    {
        $this->ergebnis = $this->abfrage->fetchAll();
        if(count($this->ergebnis) > 0)
        {
            $this->erhalten_daten();
        }
        else
        {
            $this->daten_leere();
        }
    }
    private final function ausfuhren_anweisung()
    {
        if($this->abfrage->execute($this->parameter))
        {
            return true;
        }
        return false;
    }
    private final function variable_uberprufen()
    {
        if(isset($this->abfrage))
        {
            if(!empty($this->abfrage))
            {
                return true;
            }
        }
        return false;
    }
    private final function vorbereiten_anweisung()
    {
        if(($this->abfrage = $this->verbindung->prepare($this->abfrage)))
        {
            return true;
        }
        return false;
    }
    public abstract function erhalten_daten();
    protected abstract function daten_leere();
    protected abstract function daten_uberprufen();
    protected abstract function vorbereiten_abfrage_und_parameter();
}
