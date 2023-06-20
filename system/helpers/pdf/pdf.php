<?php
/**
 * Created by PhpStorm.
 * User: RAFAELJUNIORDASILVAC
 * Date: 26/02/2019
 * Time: 14:54
 */

class pdf extends FDPF
{
   function headerPedido($filial){
      if($filial == 1){
         $this->SetX(5);
         $this->SetY(1);
         $this->Cell( 35, 3, "", '', 0);
         $this->Cell( 130, 3, "Transac Transporte Rodoviario LTDA.", '', 0);
         $this->Cell( 0, 3, substr( "Pedido de Compra" , 0), '', 1, 'C');
         $this->Cell( 35, 3, "", '', 0);
         $this->Cell( 130, 3, "CNPJ: 61.031.480/0001-42", '', 0);
         $this->Cell( 0, 3, substr( "No.:" , 0), '', 1, 'C');
         $this->Cell( 35, 3, "", '', 0);
         $this->Cell( 130, 3, "Rua Sao Gabriel, 1555, Sala 905, Vila Belvedere Americana/SP", '', 0);
         $this->Cell( 0, 3, substr( "No.:" , 0), '', 1, 'C');
      }

   }
}