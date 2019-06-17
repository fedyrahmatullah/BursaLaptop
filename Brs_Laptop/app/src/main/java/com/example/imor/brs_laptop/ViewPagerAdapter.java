package com.example.imor.brs_laptop;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;

public class ViewPagerAdapter extends FragmentPagerAdapter {

    public ViewPagerAdapter(FragmentManager fm) {
        super(fm);
    }

    @Override
    public Fragment getItem(int position) {
        if (position ==0) {
            return new Home();
        } else if (position == 1) {
            return new Product();
        }else if (position == 2) {
            return new Service();
        } else return new Notification();
    }


    @Override
    public int getCount() {
        return 4;
    }
}
