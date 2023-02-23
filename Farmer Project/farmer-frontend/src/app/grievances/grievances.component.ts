import { Component } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { CardsService } from '../services/cards.service';
@Component({
  selector: 'app-grievances',
  templateUrl: './grievances.component.html',
  styleUrls: ['./grievances.component.css'],
})
export class GrievancesComponent {
  angForm!: FormGroup;

  user = JSON.parse(localStorage.getItem('login_details') || '{}');

  error: string="";
  constructor(
    private fb: FormBuilder,
    private cardsService: CardsService,
    private router: Router
  ) {
    this.createForm();
  }
  createForm() {
    this.angForm = this.fb.group({
      title: ['', Validators.required],
      address: ['', Validators.required],
      description: ['', Validators.required],
    });
  }

  submitIssue() {
    if (!this.user.token) {
      this.error = "You need to login";
      // alert('Please login to access to submit your issues');
      // this.router.navigate(['/login']);
    }
    let issueData = {
      user_id: this.user.user.id,
      title: this.angForm.value.title,
      address: this.angForm.value.address,
      description: this.angForm.value.description,
    };
    this.cardsService.postIssue(issueData).subscribe((response: any) => {
      if (response.success) {
        this.router.navigate(['/myissues']);
      }
    });
    this.angForm.reset();
  }
}
