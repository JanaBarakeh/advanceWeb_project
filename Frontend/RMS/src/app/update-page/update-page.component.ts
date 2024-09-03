import { Component, OnInit } from '@angular/core';
import { MenuPageService } from './../menu-page.service';
import { ActivatedRoute  , Router} from '@angular/router';
//@author Jana Barakeh
@Component({
  selector: 'app-update-page',
  templateUrl: './update-page.component.html',
  styleUrls: ['./update-page.component.css']
})
export class UpdatePageComponent implements OnInit {

  itemId !: number;
  item: any;

  constructor(private route: ActivatedRoute, private router: Router, private menuService: MenuPageService) {}

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get('id');
    this.itemId = id ? +id : 0;    
    this.loadItemDetails();
  }
  loadItemDetails(): void {
    this.menuService.getMenuItemById(this.itemId).subscribe(
      (data) => {
        this.item = data;
      },
      (error) => {
        console.error('Error fetching item details', error);
      }
    );
  }
  updateItem(): void {
    this.menuService.updateMenuItem(this.itemId, this.item).subscribe(
      (response) => {
        console.log('Item updated successfully', response);
        this.router.navigate(['/menu-page']);
      },
      (error) => {
        console.error('Error updating item', error);
      }
    );
  }

}
