import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class OrderService {
  constructor(private http: HttpClient) { }

  // Get all orders in staff page.
  getAllOrders(): Observable <any> {
    return this.http.get<any>('http://localhost:8000/api/orders');
  }

  // Get customer orders in customer page.
  getOrdersForCustomer(reservationId: number): Observable <any> {
    return this.http.get<any>('http://localhost:8000/api/orders/reservation/'+reservationId);
  }

  // Get order items (details) for both customer & staff (from oders list page in staff or customer).
  getOrderDetails(orderId: number): Observable <any> {
    return this.http.get<any>('http://localhost:8000/api/orders/'+orderId+'/items');
  }

  // Get items on place order page for customer.
  getCartItems(userId: number): Observable <any> {
    return this.http.get<any>('http://localhost:8000/api/cart/user/'+userId);
  }
}
