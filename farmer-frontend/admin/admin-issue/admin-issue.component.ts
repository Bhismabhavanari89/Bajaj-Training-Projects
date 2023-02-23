import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { CardsService } from 'src/app/services/cards.service';

@Component({
  selector: 'app-admin-issue',
  templateUrl: './admin-issue.component.html',
  styleUrls: ['./admin-issue.component.css'],
})
export class AdminIssueComponent {
  issues: any;

  constructor(private cardsService: CardsService, public router: Router) {}

  ngOnInit(): void {
    let a = localStorage.getItem('admin_key');
    if (a !== '#43f') {
      this.router.navigate(['/admin']);
    }
    this.cardsService.getAllIssues().subscribe((response: any) => {
      this.issues = response;
    });
    // this.cardsService.updateIssue()
  }
  update = {
    comment: '',
    status: '',
  };
  updateIssue(id: number, comment: string, status: string) {
    this.update.comment = comment === '' ? '--admin--' : comment;
    this.update.status = status;
    //
    this.cardsService
      .updateIssue(id, this.update)
      .subscribe((response: any) => {});
  }
}
