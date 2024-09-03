import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { AuthService } from 'src/app/user-service/auth.service';
import { inject} from '@angular/core';

@Component({
  selector: 'app-customer-page',
  templateUrl: './customer-page.component.html',
  styleUrls: ['./customer-page.component.css']
})
export class CustomerPageComponent {

  userId: number | undefined;
  userName: string | undefined;
  ngOnInit() {
    this.userId = Number(this.route.snapshot.paramMap.get('userId'));
    if (this.userId) {
      this.getUserName(this.userId);
    }
  }
  
  logout_inject = inject(AuthService);
  constructor(private http: HttpClient, private router: Router,private route: ActivatedRoute,private authService: AuthService) {}

  getUserName(userId: number): void {
    this.authService.getUserById(userId).subscribe(response => {
      this.userName = response.name;
      console.log(this.userName); // Assuming the API returns a user object with a 'name' property
    }, error => {
      console.error('Failed to fetch user name', error);
    });
  }

  onSubmit() {
    this.logout_inject.logout().subscribe(response => {
      console.log('Logout successful', response);
      localStorage.removeItem('auth_token');
      this.router.navigate(['/home-page']);
    },error => {
      console.error('Logout failed', error);
    });
  }


  gotocartpage(){
      const userId = this.userId;
      this.router.navigate(['/cart', userId]);
    
  }
  navigateToMenuPage(): void {
    this.router.navigate(['/menu-page-customer']);
  }

}
