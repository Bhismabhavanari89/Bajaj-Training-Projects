import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-top-nav',
  templateUrl: './top-nav.component.html',
  styleUrls: ['./top-nav.component.css']
})
export class TopNavComponent {
  user = JSON.parse(localStorage.getItem('login_details') || '{}');
  logout() {
    localStorage.removeItem('login_details');
    this.router.navigateByUrl('/login');
  }
  constructor(
    private router: Router){}
}
