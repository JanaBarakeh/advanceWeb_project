import { MenuPageService } from './../menu-page.service';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

// @author Jana Barakeh
@Component({
  selector: 'app-menu-page',
  templateUrl: './menu-page.component.html',
  styleUrls: ['./menu-page.component.css']
})
export class MenuPageComponent implements OnInit {
  menuItems: any[] = [];
  cartItems: any[] = [];
  newItem = {
    name: '',
    description: '',
    price: 0,
    category: '',
    is_available: true
  };
  updateItem: any = {
    name: '',
    description: '',
    price: null,
    category: '',
    is_available: true
  };

  itemId!: number; 
  imageUrl: string = '';


  constructor(private menuService:MenuPageService , private router: Router) { }


  ngOnInit(): void {
    this.getAllMenuItems();
  }

  navigateToUpdatePage(itemId: number): void {
    this.router.navigate(['/update-item', itemId]);
  }
  

  
  /*addToCart(item: any) {
    this.cartItems.push(item);
    console.log('Item added to cart:', item);
  }*/
 
  // Get all menu items
  getAllMenuItems() {
    this.menuService.getMenuItems().subscribe(
      data => this.menuItems = data,
      error => console.error('Error fetching menu items', error)
    );
  }

  // Create a new menu item
  createNewItem() {
    this.menuService.creatMenuItem(this.newItem).subscribe(
      response => {
        console.log('Item created', response);
        this.getAllMenuItems(); 
      },
      error => console.error('Error creating item', error)
    );
  }

  // Update a menu item
  UpdateItem(id: number) {
    this.menuService.updateMenuItem(id,this.updateItem).subscribe(
      response => {
        console.log('Item updated', response);
        this.getAllMenuItems(); 
      },
      error => console.error('Error updating item', error)
    );
  }

  // Delete a menu item
  deleteItem(id: number) {
    this.menuService.deleteMenuItems(id).subscribe(
      response => {
        console.log('Item deleted', response);
        this.getAllMenuItems(); 
      },
      error => console.error('Error deleting item', error)
    );
  }

  // Deactivate a menu item
  deactivateItem(id: number) {
    this.menuService.deactiveMenuItem(id).subscribe(
      response => {
        console.log('Item deactivated', response);
        this.getAllMenuItems(); 
      },
      error => console.error('Error deactivating item', error)
    );
  }
}
