import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { MenuPageComponent } from './menu-page/menu-page.component';
import { FormsModule } from '@angular/forms';
import { LoginComponent } from './login/login.component';
import { MenuPageCustomerComponent } from './menu-page-customer/menu-page-customer.component';

@NgModule({
  declarations: [
    AppComponent,
    MenuPageComponent,
    LoginComponent,
    MenuPageCustomerComponent
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
