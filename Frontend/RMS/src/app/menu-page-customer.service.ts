import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

// @author Jana Barakeh
@Injectable({
  providedIn: 'root'
})
export class MenuPageCustomerService {

  private apiUrl = 'http://localhost:8000/api/menu-items';  

  constructor(private http: HttpClient) { }

   // Get all menu items
   getMenuItemsCustomer(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }
  
  searchCategory(category:String):Observable<any>{
    return this.http.get<any>(`${this.apiUrl}/category/${category}`);
  }
  
  addToCart(menuItemId: number, quantity: number): Observable<any> {
    return this.http.post<any>((`${this.apiUrl}/cart`), { menu_item_id: menuItemId, quantity });
  }

}
