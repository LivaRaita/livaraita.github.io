import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";
import { HttpClientModule } from "@angular/common/http";

import { AppRoutingModule } from "./app-routing.module";
import { AppComponent } from "./app.component";
import { PopupComponent } from "./popup/popup.component";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import { IndexComponent } from "./index/index.component";
import { ListComponent } from "./list/list.component";
import { AccessControlService } from "./access-control.service";
// import { GalleryComponent } from './gallery/gallery.component';

@NgModule({
  declarations: [AppComponent, PopupComponent, IndexComponent, ListComponent],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [AccessControlService],
  bootstrap: [AppComponent]
})
export class AppModule {}
