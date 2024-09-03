import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MenuPageComponent } from './menu-page/menu-page.component';
import { MenuPageCustomerComponent } from './menu-page-customer/menu-page-customer.component';
import { UpdatePageComponent } from './update-page/update-page.component';
import { OrderDetailsComponent } from './orders_pages/place-order-page/order-details/order-details.component';
import { OrderDetailsPageComponent } from './orders_pages/order-details-page/order-details-page/order-details-page.component';
import { OrdersListComponent } from './orders_pages/orders-list-staff-page/orders-list/orders-list.component';
import { OrderListCustomerComponent } from './orders_pages/orders-list-customer-page/order-list-customer/order-list-customer.component';
import { ReserveTablePageComponent } from './table_reservation/pages/reserve_table_page/reserve-table-page/reserve-table-page.component';

const routes: Routes = [
  { path: 'menu-page', component: MenuPageComponent },
  { path: 'order-list-stff', component: OrdersListComponent },
  { path: 'order-list-customer', component: OrderListCustomerComponent },
  { path: 'cart', component: OrderDetailsComponent },
  { path: 'order-details/:orderId', component: OrderDetailsPageComponent },
  { path: 'menu-page-customer', component: MenuPageCustomerComponent },
  { path: 'update-item/:id', component: UpdatePageComponent },
  { path: 'table-reservation', component: ReserveTablePageComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
