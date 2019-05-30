package com.example.imor.brs_laptop;

import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.os.Handler;
import android.support.design.widget.NavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.widget.Toast;

import com.example.imor.brs_laptop.Navigation.AboutActivity;
import com.example.imor.brs_laptop.Navigation.AccountActivity;
import com.example.imor.brs_laptop.Navigation.HelpActivity;
import com.example.imor.brs_laptop.Navigation.RiwayatServiceActivity;
import com.example.imor.brs_laptop.Navigation.LogoutActivity;
import com.example.imor.brs_laptop.Navigation.ServiceActivity;


public class MainActivity extends AppCompatActivity{
    DrawerLayout myDrawerLayout;
    NavigationView myNavigationView;
    FragmentManager myFragmentManager;
    FragmentTransaction myFragmentTransaction;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
        /**
         *Setup the DrawerLayout and NavigationView
         */
        myDrawerLayout = (DrawerLayout) findViewById(R.id.drawerLayout);
        myNavigationView = (NavigationView) findViewById(R.id.nav_drawer) ;
        /**
         * Lets inflate the very first fragment
         * Here , we are inflating the HomeFragment as the first Fragment
         */
        myFragmentManager = getSupportFragmentManager();
        myFragmentTransaction = myFragmentManager.beginTransaction();
        myFragmentTransaction.replace(R.id.containerView, new HomeFragment()).commit();
        /**
         * Setup click events on the Navigation View Items.
         */
        myNavigationView.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(MenuItem item) {
                myDrawerLayout.closeDrawers();
                if (item.getItemId() == R.id.nav_home) {
                    FragmentTransaction fragmentTransaction = myFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.containerView, new HomeFragment()).commit();
                }
//                else if (item.getItemId() == R.id.nav_servis) {
//                    FragmentTransaction fragmentTransaction = myFragmentManager.beginTransaction();
//                    fragmentTransaction.replace(R.id.containerView, new ServiceActivity()).commit();
//                }
//                else if (item.getItemId() == R.id.nav_keranjang) {
//                    FragmentTransaction fragmentTransaction = myFragmentManager.beginTransaction();
//                    fragmentTransaction.replace(R.id.containerView, new RiwayatServiceActivity()).commit();
//                }
                else if (item.getItemId() == R.id.nav_account) {
                    FragmentTransaction fragmentTransaction = myFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.containerView, new AccountActivity()).commit();
                }
                else if (item.getItemId() == R.id.nav_Logout) {
                    FragmentTransaction fragmentTransaction = myFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.containerView, new LogoutActivity()).commit();
                }
                else if (item.getItemId() == R.id.nav_help) {
                    FragmentTransaction fragmentTransaction = myFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.containerView, new HelpActivity()).commit();
                }
                else if (item.getItemId() == R.id.nav_about) {
                    FragmentTransaction fragmentTransaction = myFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.containerView, new AboutActivity()).commit();
                }
                return false;
            }
        });
        /**
         * Setup Drawer Toggle of the Toolbar
         */
        android.support.v7.widget.Toolbar toolbar = (android.support.v7.widget.Toolbar) findViewById(R.id.toolbar);
        ActionBarDrawerToggle mDrawerToggle = new ActionBarDrawerToggle(this, myDrawerLayout, toolbar,R.string.navigation_drawer_open,
                R.string.navigation_drawer_close);

        myDrawerLayout.setDrawerListener(mDrawerToggle);
        mDrawerToggle.syncState();
    }

    public boolean doubleTapParam = false;
    @Override
    public void onBackPressed() {
        if (doubleTapParam) {
            super.onBackPressed();
            return;
        }

        this.doubleTapParam = true;
        Toast.makeText(this, "Tap sekali lagi untuk keluar", Toast.LENGTH_SHORT).show();

        new Handler().postDelayed(new Runnable() {

            @Override
            public void run() {
                doubleTapParam = false;
            }
        }, 2000);
    }

}
