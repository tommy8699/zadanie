<?php
declare(strict_types=1);


namespace App\Components\Post\Category\Grid;


use Nette\Application\UI\Control as UiControl;

class Control extends UiControl
{
 
    public function render():void
    {
        $this->template->postCategories = [];
        $this->template->render(__DIR__ . '/default.latte');
    }
}
