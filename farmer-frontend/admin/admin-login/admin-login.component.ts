import { Component } from '@angular/core';
import { Admin } from './admin.interface';
import { Router } from '@angular/router';
import { UserserviceService } from 'src/app/userservice.service';
@Component({
  selector: 'app-admin-login',
  templateUrl: './admin-login.component.html',
  styleUrls: ['./admin-login.component.css'],
})
export class AdminLoginComponent {
  public admin!: Admin;
  constructor(
    private userserviceService: UserserviceService,
    private router: Router
  ) {}

  ngOnInit() {
    // we will initialize our form here
    this.admin = {
      username: '',
      password: '',
    };
  }

  onSubmit(f: any) {
    let userData = f.value;
    this.userserviceService.adminlogin(userData).subscribe((response: any) => {
      if (response.success === true) {
        localStorage.setItem('admin_key', '#43f');
        this.router.navigate(['/admin-home']);
      } else {
      }
    });
  }
}
