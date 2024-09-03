import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent {
  formData: any = {
    name: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role_id: '2', // Set the default role ID customer
    policy: false
  };
  private apiUrl = 'http://localhost:8000/api/users'; 

  constructor(private http: HttpClient, private router: Router) {}

  updateName(){
    this.formData.name = `${this.formData.first_name} ${this.formData.last_name}`;
  }

  onSubmit(){
    if (this.formData.password !== this.formData.password_confirmation) {
      alert('Passwords do not match!');
      return;
    }
    this.updateName();

    this.http.post(this.apiUrl, this.formData).subscribe({
      next: (response) => {
        // alert('Registration successful!');
        this.router.navigate(['/customer-page']);
      },
      error: (error) => {
        console.error('Registration failed:', error);
        alert('Registration failed! Please try again.');
      }
    });
  }
}
