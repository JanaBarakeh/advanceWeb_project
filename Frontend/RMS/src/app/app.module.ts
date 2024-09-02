import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { MenuPageComponent } from './menu-page/menu-page.component';
import { FormsModule } from '@angular/forms';
import { LoginComponent } from './login/login.component';
import { MenuPageCustomerComponent } from './menu-page-customer/menu-page-customer.component';
import { OrderDetailsComponent } from './orders_pages/place-order-page/order-details/order-details.component';
import { OrderDetailsCardComponent } from './orders_pages/place-order-page/order-details-card/order-details-card.component';
import { OrderDetailsItemsComponent } from './orders_pages/place-order-page/order-details-items/order-details-items.component';
import { OrderDetailsSummaryComponent } from './orders_pages/place-order-page/order-details-summary/order-details-summary.component';
import { OrderDetailsItemComponent } from './orders_pages/place-order-page/order-details-item/order-details-item.component';
import { OrdersListComponent } from './orders_pages/orders-list-staff-page/orders-list/orders-list.component';
import { OrderComponent } from './orders_pages/orders-list-staff-page/order/order.component';
import { ListHeadComponent } from './orders_pages/orders-list-staff-page/list-head/list-head.component';
import { OrderDetailsPageComponent } from './orders_pages/order-details-page/order-details-page/order-details-page.component';
import { OrderCardComponent } from './orders_pages/order-details-page/order-card/order-card.component';
import { OrderItemComponent } from './orders_pages/order-details-page/order-item/order-item.component';
import { OrderItemsComponent } from './orders_pages/order-details-page/order-items/order-items.component';
import { OrderSummaryComponent } from './orders_pages/order-details-page/order-summary/order-summary.component';
import { OrderInfoComponent } from './orders_pages/orders-list-customer-page/order-info/order-info.component';
import { OrderListCustomerComponent } from './orders_pages/orders-list-customer-page/order-list-customer/order-list-customer.component';
import { UpdatePageComponent } from './update-page/update-page.component';

@NgModule({
  declarations: [
    AppComponent,
    MenuPageComponent,
    LoginComponent,
    MenuPageCustomerComponent,
    OrderDetailsComponent,
    OrderDetailsCardComponent,
    OrderDetailsItemsComponent,
    OrderDetailsSummaryComponent,
    OrderDetailsItemComponent,
    OrdersListComponent,
    OrderComponent,
    ListHeadComponent,
    OrderDetailsPageComponent,
    OrderCardComponent,
    OrderItemComponent,
    OrderItemsComponent,
    OrderSummaryComponent,
    OrderInfoComponent,
    OrderListCustomerComponent,
    UpdatePageComponent,
    
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
