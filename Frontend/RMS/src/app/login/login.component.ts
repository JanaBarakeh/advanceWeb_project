import { Component, inject, Input } from '@angular/core';
import { AuthService } from 'src/app/user-service/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})
export class LoginComponent {
  showLoginForm = false;
  showSignupForm = false;

  showLogin() {
    this.showLoginForm = true;
    this.showSignupForm = false;
  }

  showSignup() {
    this.showLoginForm = false;
    this.showSignupForm = true;
  }

  @Input() email: any;
  @Input() password: any;

  constructor(private router: Router) {}

  login_inject = inject(AuthService);

  onSubmit() {
    this.login_inject.Login(this.email, this.password).subscribe(
      (response) => {
        console.log(response);

        localStorage.setItem('auth_token', response.access_token);

        const userId = response.user_id;
        const roleId = response.role_id;

        if (roleId == 1) {
          this.router.navigate(['/admin-page'], {
            queryParams: { userId: userId, roleId: roleId },
          });
        } else if (roleId == 2) {
          this.router.navigate(['/customer-page', userId]);
        } else if (roleId == 3) {
          this.router.navigate(['/staff-page'], {
            queryParams: { userId: userId, roleId: roleId },
          });
        }
      },
      (error) => {
        console.error('Login failed', error);
      }
    );
  }
}
