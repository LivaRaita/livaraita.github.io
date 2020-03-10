export class Users {
  id: number;
  name: string;
  email: string;

  constructor($data) {
    this.id = $data["id"];
    this.name = $data["first_name"] + " " + $data["last_name"];
    this.email = $data["email"];
  }
}
