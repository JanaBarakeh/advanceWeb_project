import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-order-details-summary',
  templateUrl: './order-details-summary.component.html',
  styleUrls: ['./order-details-summary.component.css']
})
export class OrderDetailsSummaryComponent implements OnInit{
  @Input() items: any; 
  itemsTotal = 0;
  total=0;
  discount = 0;
  ngOnInit(): void {
    this.calculteTotal()
  }

  
   calculteTotal(){
    this.items.forEach((item: { price: number; quantity: number; }) => {
      this.itemsTotal =  this.itemsTotal + (item.price * item.quantity);
    });
    this.total = this.itemsTotal - this.discount;

  }
  
  applyDiscount(code: string) {
    // Implement discount logic
  //   if (code === 'DISCOUNT10') {
  //     this.discount = 10;
  //     this.total = this.itemsTotal + this.shippingCost - this.discount;
  //   }
   }
}
