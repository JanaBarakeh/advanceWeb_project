import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

// @author Jana Barakeh
@Injectable({
  providedIn: 'root'
})
export class MenuPageService {

  private apiUrl = 'http://localhost:8000/api/menu-items';  

  constructor(private http: HttpClient) { }


  
  // Get all menu items
  getMenuItems(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }

  //create a menu items
  creatMenuItem(data:any):Observable<any>{
    return this.http.post<any>(this.apiUrl ,data);
  }
  createMenuItem(formData: FormData): Observable<any> {
    return this.http.post<any>(this.apiUrl, formData);
  }

  // update an existing menu items
  updateMenuItem(id : number , data : any):Observable<any>{
     return this.http.put<any>(`${this.apiUrl}/${id}`, data);
  }
  
  //delete a menu item 
  deleteMenuItems(id: number):Observable<any>{
    return this.http.delete<any>(`${this.apiUrl}/${id}`);
  }

  // deactive menu item 
  deactiveMenuItem(id: number):Observable<any>{
    return this.http.patch<any>(`${this.apiUrl}/${id}/deactivate`,{});
  }

  getMenuItemById(id: number): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/${id}`);
  }
  getMenuItemImageById(id: number) {
    return this.http.get(`http://localhost:8000/api/menu-items/image/${id}`);
  }
  
}
