import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ReviewService {
  private apiUrl = 'http://127.0.0.1:8000/api/reviews';

  constructor(private http: HttpClient) { }

  getAllReviews(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }

  getReviewById(id: number): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/${id}`);
  }

  createReview(review: any): Observable<any> {
    return this.http.post<any>(this.apiUrl, review);
  }

  updateReview(id: number, review: any): Observable<any> {
    return this.http.put<any>(`${this.apiUrl}/${id}`, review);
  }

  deleteReview(id: number): Observable<any> {
    return this.http.delete<any>(`${this.apiUrl}/${id}`);
  }
}
