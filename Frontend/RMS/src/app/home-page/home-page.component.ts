// home-page.component.ts
import { Component } from '@angular/core';

@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent {
  
    showOverlay: boolean = false;
    showLoginForm: boolean = false;
    showSignupForm: boolean = false;

    // Method to open the login form
    openLoginForm() {
        this.showOverlay = true;
        this.showLoginForm = true;
        this.showSignupForm = false;
    }

    // Method to open the signup form
    openSignupForm() {
        this.showOverlay = true;
        this.showLoginForm = false;
        this.showSignupForm = true;
    }

    // Method to close the overlay
    closeOverlay() {
        this.showOverlay = false;
        this.showLoginForm = false;
        this.showSignupForm = false;
    }
}
