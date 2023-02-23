import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-admin-top-nav',
  templateUrl: './admin-top-nav.component.html',
  styleUrls: ['./admin-top-nav.component.css']
})
export class AdminTopNavComponent {

  constructor(public router: Router){}
  logout() {
    localStorage.removeItem('admin_key');
    this.router.navigateByUrl('/admin');
  }
}
