<?php

declare(strict_types=1);

namespace App\Model\Repositories;

final class ProductRepository extends BaseRepository
{

    public static function getTableName(): string
    {
        return 'product';
    }

    public function getWarehouseValue($productId) 
    {
        $sql = "SELECT 
            p.pid, 
            COALESCE(pa.purchase_price_usd, p.purchase_price_usd) AS purchase_price_usd,
            COALESCE(pa.rate_eur_usd, p.rate_eur_usd) AS rate_eur_usd,
            COALESCE(pa.stock_quantity, p.stock_quantity) AS stock_quantity
            FROM product p
            LEFT JOIN product_attribute pa ON p.pid = pa.pid
            WHERE p.pid = ?";

        $product = $this->connection->fetch($sql, $productId);
        $totalValueEUR = 0;
        
        if($product != null) {
            $priceEUR = $product['purchase_price_usd'] * $product['rate_eur_usd'];
            $totalValueEUR += $priceEUR * $product['stock_quantity'];
            $result[$productId] = round($totalValueEUR,2);
        }

        return $result;
    }

}
