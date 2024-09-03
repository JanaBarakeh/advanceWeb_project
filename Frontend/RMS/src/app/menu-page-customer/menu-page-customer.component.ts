import { ActivatedRoute } from '@angular/router';
import { MenuPageCustomerService } from './../menu-page-customer.service';
import { Component, Input, OnInit } from '@angular/core';

// @author Jana Barakeh
@Component({
  selector: 'app-menu-page-customer',
  templateUrl: './menu-page-customer.component.html',
  styleUrls: ['./menu-page-customer.component.css']
})
export class MenuPageCustomerComponent implements OnInit {
  menuItems: any[] = [];
  searchCategory: string = ''; 
  constructor(private menuCustomerService: MenuPageCustomerService, private route: ActivatedRoute) { }

  userId!: number;



  ngOnInit(): void {
   this.getAllMenuItems();
   this.userId = Number(this.route.snapshot.paramMap.get('userId'));

  }

  
  getAllMenuItems() {
    this.menuCustomerService.getMenuItemsCustomer().subscribe(
      data => this.menuItems = data,
      error => console.error('Error fetching menu items', error)
    );
  }
  search(): void {
    if (this.searchCategory.trim() !== '') {
      this. getCategory(this.searchCategory);
    } else {
      alert('Please enter a category to search.');
    }
  }
    getCategory (Category:String ):void{
    this.menuCustomerService.searchCategory(Category).subscribe(
    data=>{
      this.menuItems =data;
    },
    error=>{
      this.getAllMenuItems();
    }
    );
    }
    addToCart(menuItemId: number, price:number) {
      this.menuCustomerService.addToCart(menuItemId,1,this.userId, price).subscribe(response => {
        console.log('Item added to cart', response);
      });
    }
}
