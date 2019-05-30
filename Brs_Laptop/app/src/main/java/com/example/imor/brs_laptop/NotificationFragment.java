package com.example.imor.brs_laptop;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;

/**
 * Created by Jauhar xlr on 4/18/2016.
 * mycreativecodes.in
 */
public class NotificationFragment extends Fragment {

    public NotificationFragment(){

    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View rootView = inflater.inflate(R.layout.notification_layout, container, false);
        ListView listView = (ListView) rootView.findViewById(R.id.list);
        final String[] items = new String[]{"Pesanan Jasa Service","Servis Dalam Pengerjaan","Service Selesai"};
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(getActivity(), android.R.layout.simple_list_item_1, items);
        listView.setAdapter(adapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                Intent intent;
                if (position == 0) {
                    intent = new Intent(getActivity(), PesananJasaService.class);
                    startActivity(intent);
                } else if (position == 1) {
                    intent = new Intent(getActivity(), ServisDalamPengerjaan.class);
                    startActivity(intent);
                } else if (position == 2) {
                    intent = new Intent(getActivity(), ServiceSelesai.class);
                    startActivity(intent);
                }

            }
        });
        return rootView;

    }
}