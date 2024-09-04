import { Component } from '@angular/core';
import { IReview } from '../admin-review-card/IReview';
import { ReviewService } from '../admin-review-card/reviewService/review.service';

@Component({
  selector: 'app-admin-reviews',
  templateUrl: './admin-reviews.component.html',
  styleUrls: ['./admin-reviews.component.css']
})
export class AdminReviewsComponent {
  reviews: IReview[] = [];

  constructor(private reviewService: ReviewService) { }

  ngOnInit(): void {
    this.loadReviews();
  }

  loadReviews(): void {
    this.reviewService.getAllReviews().subscribe(
      (data) => {
        this.reviews = data;
        console.log(this.reviews);
      },
      (error) => {
        console.error('Error fetching reviews', error);
      }
    );
  }
}
