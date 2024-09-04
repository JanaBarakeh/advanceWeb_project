import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-dashboard-card',
  templateUrl: './dashboard-card.component.html',
  styleUrls: ['./dashboard-card.component.css']
})
export class DashboardCardComponent {
  @Input() title: string | undefined;
  @Input() period: string | undefined;
  @Input() data: string | undefined;
  @Input() icon: string | undefined;
}
