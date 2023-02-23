import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root',
})
export class UserserviceService {
  constructor(private httpClient: HttpClient) {}

  createUser(data: any) {
    let headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
    return this.httpClient.post('http://localhost:8000/api/users', data, {
      headers,
    });
  }

  login(data: any) {
    let headers = { 'Content-Type': 'application/json' , 'Accept': 'application/json' };
    return this.httpClient.post('http://localhost:8000/api/users/login', data, {
      headers,
    });
  }

  adminlogin(data: any) {
    let headers = { 'Content-Type': 'application/json' , 'Accept': 'application/json' };
    return this.httpClient.post(
      'http://localhost:8000/api/admins/login',
      data,
      { headers }
    );
  }
}
