import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MenuPageComponent } from './menu-page/menu-page.component';
import { MenuPageCustomerComponent } from './menu-page-customer/menu-page-customer.component';
import { UpdatePageComponent } from './update-page/update-page.component';
import { OrderDetailsComponent } from './orders_pages/place-order-page/order-details/order-details.component';
import { OrderDetailsPageComponent } from './orders_pages/order-details-page/order-details-page/order-details-page.component';

const routes: Routes = [
  { path: 'menu-page', component: MenuPageComponent },
  { path: 'order-details', component: OrderDetailsPageComponent},
  {path : 'menu-page-customer',component:MenuPageCustomerComponent },
  { path: 'update-item/:id', component: UpdatePageComponent }
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
