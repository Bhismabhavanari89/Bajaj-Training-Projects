import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root',
})
export class CardsService {
  constructor(private httpClient: HttpClient) {}

  user = JSON.parse(localStorage.getItem('login_details') || '{}');
  token = this.user.token;
  getMachines() {

    return this.httpClient.get('http://localhost:8000/api/machineries');
  }

  getCrops() {
    return this.httpClient.get('http://localhost:8000/api/crops');
  }

  getFertilizers() {

    return this.httpClient.get('http://localhost:8000/api/Fertilizer');
  }

  getAllProducts() {
    return this.httpClient.get('http://localhost:8000/api/products');
  }

  getProducts() {
    let headers = {
      Authorization: `Bearer ${this.token}`,
    };
    return this.httpClient.get(
      `http://localhost:8000/api/productswithcart/${this.user.user.id}`,{headers}
    );
  }

  addToCart(data: any) {
    let headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${this.token}`,
    };
    return this.httpClient.post('http://localhost:8000/api/cart/add', data, {
      headers,
    });
  }

  removeFromCart(userid: any, productid: any) {
    let headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${this.token}`,
    };
    return this.httpClient.delete(
      `http://localhost:8000/api/removefromcart/${userid}/${productid}`,{headers}
    );
  }

  getCartProducts(userid: any) {
    let headers = {
      Authorization: `Bearer ${this.token}`,
    };
    return this.httpClient.get(`http://localhost:8000/api/cart/${userid}`, {
      headers,
    });
  }

  updateCart(data: any, id: number) {
    let headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${this.token}`,
    };
    return this.httpClient.put(
      `http://localhost:8000/api/cart/update/${id}`,
      data,
      { headers }
    );
  }

  getIssue(id: any) {
    let headers = {
      Authorization: `Bearer ${this.token}`,
    };
    return this.httpClient.get(`http://localhost:8000/api/issue/${id}`, {
      headers,
    });
  }

  getAllIssues() {
    let headers = {
      Authorization: `Bearer ${this.token}`,
    };
    return this.httpClient.get(`http://localhost:8000/api/issue`, {
      headers,
    });
  }

  postIssue(data: any) {
    let headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${this.token}`,
    };
    return this.httpClient.post('http://localhost:8000/api/issue', data, {
      headers,
    });
  }

  updateIssue(id: any, data: any) {
    let headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${this.token}`,
    };
    return this.httpClient.put(`http://localhost:8000/api/issue/${id}`, data, {
      headers,
    });
  }

  addProduct(data: any) {
    let headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${this.token}`,
    };
    return this.httpClient.post('http://localhost:8000/api/products', data, {
      headers,
    });
  }

  updateProduct(product_id: any, data: any) {
    let headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${this.token}`,
    };
    return this.httpClient.put(
      `http://localhost:8000/api/products/${product_id}`,
      data,
      { headers }
    );
  }

  getProduct(product_id: any) {
    return this.httpClient.get(
      `http://localhost:8000/api/products/${product_id}`
    );
  }

  getCategory() {
    return this.httpClient.get(`http://localhost:8000/api/categories`);
  }
}
