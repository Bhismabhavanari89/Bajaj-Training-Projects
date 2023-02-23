import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdminIssueComponent } from './admin-issue.component';

describe('AdminIssueComponent', () => {
  let component: AdminIssueComponent;
  let fixture: ComponentFixture<AdminIssueComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdminIssueComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AdminIssueComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
