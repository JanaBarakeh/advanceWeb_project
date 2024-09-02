// @author Farah Elhasan

import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-order-details-page',
  templateUrl: './order-details-page.component.html',
  styleUrls: ['./order-details-page.component.css']
})
export class OrderDetailsPageComponent implements OnInit {
  // @Input() orderId :any

  orderId: number | undefined;

  constructor(private route: ActivatedRoute) {}

  ngOnInit() {
    this.orderId = Number(this.route.snapshot.paramMap.get('orderId'));
    console.log(this.orderId);
  }
}
