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
import { ReservationDetailsComponent } from './table_reservation/pages/reservation_details_page/reservation-details.component';
import { LoginComponent } from './login/login.component';
import { SignupComponent } from './signup/signup.component';
import { HomePageComponent } from './home-page/home-page.component';
import { CustomerPageComponent } from './customer-page/customer-page.component';
import { AddmenuitemPageComponent } from './addmenuitem-page/addmenuitem-page.component';
import { UserReservationsComponent } from './table_reservation/pages/view_reservations_page/user-reservations.component';
import { ReservationTableComponent } from './table_reservation/pages/reservation-table/reservation-table.component';
import { TablesTableComponent } from './table_reservation/components/tables-table/tables-table.component';
import { TablesPageComponent } from './table_reservation/pages/tables-page/tables-page.component';

const routes: Routes = [
  { path: 'menu-page', component: MenuPageComponent },
  { path: 'order-list-stff', component: OrdersListComponent },
  {
    path: 'order-list-customer/:reservationId',
    component: OrderListCustomerComponent,
  },
  { path: 'cart/:userId/:reservationId', component: OrderDetailsComponent },
  { path: 'home', component: HomePageComponent },
  { path: 'login', component: LoginComponent },
  { path: 'signup', component: SignupComponent },
  { path: 'costemerpage', component: CustomerPageComponent },
  { path: 'home-page', component: HomePageComponent },
  {
    path: 'order-details/:orderId/:orderStatus',
    component: OrderDetailsPageComponent,
  },
  { path: 'menu-page-customer', component: MenuPageCustomerComponent },
  { path: 'cart', component: OrderDetailsComponent },
  { path: 'order-details/:orderId', component: OrderDetailsPageComponent },
  { path: 'menu-page-customer', component: MenuPageCustomerComponent },
  { path: 'update-item/:id', component: UpdatePageComponent },
  { path: 'table-reservation', component: ReserveTablePageComponent },
  { path: 'reservation-details/:id', component: ReservationDetailsComponent },
  { path: 'cart', component: OrderDetailsComponent },
  { path: 'order-details/:orderId', component: OrderDetailsPageComponent },
  { path: 'home', component: HomePageComponent },
  { path: 'login', component: LoginComponent },
  { path: 'signup', component: SignupComponent },
  { path: 'costemerpage', component: CustomerPageComponent },
  { path: 'home-page', component: HomePageComponent },
  { path: 'order-details/:orderId', component: OrderDetailsPageComponent },
  {
    path: 'order-details/:orderId/:orderStatus',
    component: OrderDetailsPageComponent,
  },
  { path: 'menu-page-customer', component: MenuPageCustomerComponent },
  { path: 'update-item/:id', component: UpdatePageComponent },
  { path: 'addmenuitem-page', component: AddmenuitemPageComponent },
  { path: 'my-reservations', component: UserReservationsComponent },
  { path: 'reservations', component: ReservationTableComponent },
  { path: 'tables', component: TablesPageComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
