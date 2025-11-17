<?php 

namespace App\Enums;

enum OrderStatus: string {
    case CREATED_STATUS  = 'Criado';
    case PENDING_STATUS  = 'Pendente';
    case PAID_STATUS     = 'Pago';
    case DELIVERY_STATUS = 'Enviado';
    case FINISH_STATUS   = 'Finalizado';
}