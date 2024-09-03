import { Component, Input, OnChanges, OnInit } from '@angular/core';
// @author Farah Elhasan

@Component({
  selector: 'app-order-summary',
  templateUrl: './order-summary.component.html',
  styleUrls: ['./order-summary.component.css']
})
export class OrderSummaryComponent implements OnChanges{
  @Input() items: any; 
  @Input() orderStatus:any
  itemsTotal = 0;
  total=0;
  discount = 0;

  ngOnChanges(): void {
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
