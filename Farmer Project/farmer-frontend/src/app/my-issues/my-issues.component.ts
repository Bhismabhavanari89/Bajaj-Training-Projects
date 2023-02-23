import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { CardsService } from '../services/cards.service';

@Component({
  selector: 'app-my-issues',
  templateUrl: './my-issues.component.html',
  styleUrls: ['./my-issues.component.css'],
})
export class MyIssuesComponent {
  issues: any;
  constructor(private cardsService: CardsService, public router: Router) {}
  user = JSON.parse(localStorage.getItem('login_details') || '{}');
  ngOnInit(): void {
    if (!this.user.token) {
      this.router.navigate(['/login']);
    }
    this.cardsService.getIssue(this.user.user.id).subscribe((response: any) => {
      this.issues = response;
      //
    });
  }
}
