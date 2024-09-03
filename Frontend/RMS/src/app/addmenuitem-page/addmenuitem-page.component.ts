import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { MenuPageService } from '../menu-page.service';
/*@author Jana Barakeh*/
@Component({
  selector: 'app-addmenuitem-page',
  templateUrl: './addmenuitem-page.component.html',
  styleUrls: ['./addmenuitem-page.component.css']
})
export class AddmenuitemPageComponent implements OnInit {
  menuItemForm!: FormGroup;
  uploadedFile: File | null = null;

  constructor(private fb: FormBuilder, private menuservice: MenuPageService) {
    this.menuItemForm = this.fb.group({
      name: ['', Validators.required],
      description: [''],
      price: ['', [Validators.required, Validators.min(0)]],
      is_available: [true, Validators.required],
      category: ['', Validators.required],
      image: [''] // No validators for the file input
    });
  }

  ngOnInit(): void {}

  onFileSelected(event: any) {
    const file: File = event.target.files[0];
    if (file) {
      this.uploadedFile = file;
    }
  }

  createNewItem() {
    if (this.menuItemForm.invalid) {
      return;
    }

    const formData = new FormData();
    formData.append('name', this.menuItemForm.value.name);
    formData.append('description', this.menuItemForm.value.description);
    formData.append('price', this.menuItemForm.value.price);
    formData.append('is_available', this.menuItemForm.value.is_available);
    formData.append('category', this.menuItemForm.value.category);
    if (this.uploadedFile) {
      formData.append('image', this.uploadedFile);
    }

      this.menuservice.createMenuItem(formData).subscribe(
        response => {
          console.log('Item created', response);
        },
        error => console.error('Error creating item', error)
      );

  }
}
