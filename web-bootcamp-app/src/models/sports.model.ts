export class Sport {
  id: number;
  name: string;
  teamSport?: boolean;

  constructor($data) {
    this.id = $data["id"];
    this.name = $data["full_name"] || null;
    this.teamSport = $data["teamSport"] || false;
  }
}
