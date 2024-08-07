<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Repositories\ProductRepository;
use Nette\Application\UI\Presenter;


final class HomepagePresenter extends Presenter
{    
    private $productRepository;

    public $productId;

    public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}

    public function actionDefault():void
    {

    }

    public function renderDefault():void
    {
        $this->template->productId = $this->productId;
        $this->template->products = $this->productRepository->findAll()->fetchAll();
        $this->template->warehouseValue = $this->productId != null ? $this->productRepository->getWarehouseValue($this->productId) : null;
    }

    public function handleGetWarehouseValue($productId) 
    {
        $this->productId = (int)$productId;
        $this->redrawControl("content");
    }
}
