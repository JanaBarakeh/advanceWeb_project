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
  
  ngOnInit() {
    this.userId = Number(this.route.snapshot.paramMap.get('userId'));
  }
  logout_inject = inject(AuthService);
  constructor(private http: HttpClient, private router: Router,private route: ActivatedRoute) {}

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
}
