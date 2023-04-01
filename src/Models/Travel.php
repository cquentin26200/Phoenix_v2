<?php

namespace Travel\Models;

/** Class User **/
class Travel
{
    private $LIBELLE_VOYAGE;
    private $DESC_VOYAGE;
    private $PRIX_VOYAGE;
    private $IMAGE_VOYAGE;
    private $ID_VOYAGE;
    private $TAG_VOYAGE;
    private $LIBELLE_TAG;

    public function getLIBELLE_TAG()
    {
        return $this->LIBELLE_TAG;
    }

    public function getTAG_VOYAGE()
    {
        return $this->TAG_VOYAGE;
    }

    public function getID_VOYAGE()
    {
        return $this->ID_VOYAGE;
    }

    public function getLIBELLE_VOYAGE()
    {
        return $this->LIBELLE_VOYAGE;
    }

    public function getDESC_VOYAGE()
    {
        return $this->DESC_VOYAGE;
    }

    public function getPRIX_VOYAGE()
    {
        return $this->PRIX_VOYAGE;
    }

    public function getIMAGE_VOYAGE()
    {
        return $this->IMAGE_VOYAGE;
    }

    public function setLIBELLE_TAG($LIBELLE_TAG)
    {
        $this->LIBELLE_TAG = $LIBELLE_TAG;
    }

    public function setTAG_VOYAGE($TAG_VOYAGE)
    {
        $this->TAG_VOYAGE = $TAG_VOYAGE;
    }

    public function setID_VOYAGE($ID_VOYAGE)
    {
        $this->ID_VOYAGE = $ID_VOYAGE;
    }

    public function setLIBELLE_VOYAGE($LIBELLE_VOYAGE)
    {
        $this->LIBELLE_VOYAGE = $LIBELLE_VOYAGE;
    }

    public function setDESC_VOYAGE($DESC_VOYAGE)
    {
        $this->DESC_VOYAGE = $DESC_VOYAGE;
    }

    public function setPRIX_VOYAGE($PRIX_VOYAGE)
    {
        $this->PRIX_VOYAGE = $PRIX_VOYAGE;
    }

    public function setIMAGE_VOYAGE($IMAGE_VOYAGE)
    {
        $this->IMAGE_VOYAGE = $IMAGE_VOYAGE;
    }
}
