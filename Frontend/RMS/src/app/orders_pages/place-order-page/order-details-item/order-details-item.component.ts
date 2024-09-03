import { Component, EventEmitter, inject, Input, Output } from '@angular/core';
import { OrderService } from 'src/app/order-service/order.service';
// @author Farah Elhasan

@Component({
  selector: 'app-order-details-item',
  templateUrl: './order-details-item.component.html',
  styleUrls: ['./order-details-item.component.css']
})
export class OrderDetailsItemComponent {
  @Input() item: any;
  @Output() quantityChange = new EventEmitter<void>(); // Emit event on quantity change
  @Output() deleteItem = new EventEmitter<void>(); // Emit event on deleteItem
  
  orderService = inject(OrderService);

  
  incrementQuantity() {
    this.item.quantity++;
    //save to database.
    this.saveQuantity( this.item.id, this.item.quantity)
    this.quantityChange.emit(); // Emit event
    
    console.log("emit");
  }

  decrementQuantity() {
    if (this.item.quantity > 1) {
      this.item.quantity--;
      //save to database.
      this.saveQuantity( this.item.id, this.item.quantity)
      this.quantityChange.emit(); // Emit event
      
    }
  }

 saveQuantity(itemId: number, quantity: number){
  this.orderService.updateQuantity(itemId, quantity).subscribe(response =>
    console.log(response)
  )
}

  removeItem() {
    this.deleteItem.emit();
    this.orderService.deleteCartItem(this.item.id).subscribe(response =>
      console.log(response)
    )
   
    // Implement item removal logic
    // remove from cart table
  }
}
