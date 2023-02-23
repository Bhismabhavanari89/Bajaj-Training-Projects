export interface User {
    name: string; // required with minimum 5 characters
    email: string;
    phone: string;
    address: string;
    descritpion: string;
}

export interface User1{
    email: string,
    password: string
}

export interface User2 { 
    firstname: string,  
    lastname: string,     
    email: string,
    password: string,
    phonenumber: number
}