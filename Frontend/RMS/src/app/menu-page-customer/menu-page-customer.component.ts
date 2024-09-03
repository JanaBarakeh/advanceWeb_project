import { MenuPageCustomerService } from './../menu-page-customer.service';
import { Component, OnInit } from '@angular/core';

// @author Jana Barakeh
@Component({
  selector: 'app-menu-page-customer',
  templateUrl: './menu-page-customer.component.html',
  styleUrls: ['./menu-page-customer.component.css']
})
export class MenuPageCustomerComponent implements OnInit {
  menuItems: any[] = [];
  searchCategory: string = ''; 
  
  constructor(private menuCustomerService: MenuPageCustomerService) { }


  ngOnInit(): void {
   this.getAllMenuItems();
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
  
  


}
