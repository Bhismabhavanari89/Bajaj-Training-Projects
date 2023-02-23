import { Component } from '@angular/core';
import { User2 } from '../user.interface';
import { UserserviceService } from '../userservice.service';
import {
  FormBuilder,
  FormControl,
  Validators,
  FormGroup,
  NgForm,
} from '@angular/forms';
import { Router } from '@angular/router';
@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css'],
})
export class SignupComponent {
  constructor(
    private userserviceService: UserserviceService,
    private router: Router
  ) {}
  onSubmit(f: any) {
    let userData = f.value;

    this.userserviceService.createUser(userData).subscribe((response: any) => {
      if (response.success === true) {
        this.router.navigateByUrl('/login');
      } else {
      }
    });

    // f.reset();
  }
  public user2!: User2; // our model

  ngOnInit() {
    // we will initialize our form here
    this.user2 = {
      firstname: '',
      lastname: '',
      email: '',
      password: '',
      phonenumber: 0,
    };
  }

  save(model: User2, isValid: boolean) {
    // check if model is valid// if valid, call API to save customer
  }
}
