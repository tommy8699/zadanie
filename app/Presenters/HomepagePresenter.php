<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Repositories\PostCategoryRepository;
use Nette\Application\UI\Presenter;


final class HomepagePresenter extends Presenter
{    
    private $postCategoryRepository;

    public $productId;

    public function __construct(PostCategoryRepository $postCategoryRepository)
	{
		$this->postCategoryRepository = $postCategoryRepository;
	}

    public function actionDefault():void
    {

    }

    public function renderDefault():void
    {
        $this->template->productId = $this->productId;
        $this->template->products = $this->postCategoryRepository->findAll();
        $this->template->warehouseValue = $this->productId != null ? $this->postCategoryRepository->getById($this->productId)->fetch() : null;
    }

    public function handleGetWarehouseValue($productId) 
    {
        bdump($productId);
        $this->productId = $productId;
    }
}
