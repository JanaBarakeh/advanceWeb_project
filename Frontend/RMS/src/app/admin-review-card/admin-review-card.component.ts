import { Component, Input } from '@angular/core';
import { IReview } from './IReview';

@Component({
  selector: 'app-admin-review-card',
  templateUrl: './admin-review-card.component.html',
  styleUrls: ['./admin-review-card.component.css']
})
export class AdminReviewCardComponent {
  @Input() review: IReview | undefined;
}
