<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\View\Html;

abstract class Page extends Html
{
	public function render()
	{
		$this->html =
			'<!DOCTYPE html>
			<html lang="de">
			  <head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<title>' . $this->htmlPageTitle() . ' | Touren-Liste</title>
				<link rel="icon" type="image/x-icon" href="bike-hell.png">
				<link rel="stylesheet" href="stylesheet.css">
			  </head>
			  ' . $this->htmlAktionHome() . '
			  ' . $this->htmlAktionListe() . '			  
			  ' . $this->htmlAktionSuche(). '		            
			  ' . $this->htmlBody() . '			  
			</html>';
	}

	/**
	 * @return string
	 */
	abstract protected function htmlPageTitle();

	/**
	 * @return string|null
	 */
	abstract protected function htmlBody();

    protected function htmlAktionHome()
    {
        $query = http_build_query(array(
            Name::Task => Task::Home
        ));

        $result = '<a href="/?' . $query . '">Übersicht</a>';
        return $result;
    }

    protected function htmlAktionListe()
    {
        $query = http_build_query(array(
            Name::Task => Task::ShowTourenListe
        ));

        $result = '<a href="/?' . $query . '">alle Touren</a>';
        return $result;
    }

    protected function htmlAktionSuche()
    {
        $query = http_build_query(array(
            Name::Task => Task::Suche
        ));

        $result = '<a href="/?' . $query . '">Suche</a>';
        return $result;
    }
}
