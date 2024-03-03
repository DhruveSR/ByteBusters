from joblib import dump, load
import pandas as pd
from sklearn.model_selection import train_test_split, cross_val_score
from sklearn.metrics import accuracy_score, confusion_matrix, classification_report
from sklearn.naive_bayes import MultinomialNB
from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import RandomForestClassifier, GradientBoostingClassifier
import seaborn as sns
import matplotlib.pyplot as plt

class DiseasePrediction:
    def __init__(self, model_name = None):
        self.verbose = True
        self.train_data_path = "Disease prediction/train_test_data/Training.csv"
        self.test_data_path = "Disease prediction/train_test_data/Testing.csv"
        self.validation_size = 0.33
        self.random_state = 101
        self.train_features, self.train_labels, self.train_df = self._load_train_dataset()
        self.test_features, self.test_labels, self.test_df = self._load_test_dataset()
        self._feature_correlation(data_frame=self.train_df, show_fig = False)
        self.model_name = model_name
        self.model_save_path = 'Disease prediction/model/'

    def _load_train_dataset(self):
        df_train = pd.read_csv(self.train_data_path)
        cols = df_train.columns
        cols = cols[:-2]
        train_features = df_train[cols]
        train_labels = df_train['prognosis']

        assert(len(train_features.iloc[0]) == 132)
        assert(len(train_labels) == train_features.shape[0])
        #assert error ke liye
        #pehle voh check kar rha hai ki no of features(symptoms) 132 hai ki nhi by using iloc.
        #ilic[0] matlb voh 0 index ke rows ko select karega, fir using len uska length nikal rhe hai
        #second assert check kar rha hai ki labels(disease) aur features ke rows same no ke hai ki nhi

        if self.verbose:
            print("Length of Training Data: ", df_train.shape)
            print("Training Features: ", train_features.shape)
            print("Training Labels: ", train_labels.shape)
        return train_features, train_labels, df_train
    
    def _load_test_dataset(self):
        df_test = pd.read_csv(self.test_data_path)
        cols = df_test.columns
        cols = cols[:-1]
        test_features = df_test[cols]
        test_labels = df_test['prognosis']

        assert(len(test_features.iloc[0]) == 132)
        assert(len(test_labels) == test_features.shape[0])

        if self.verbose:
            print("Length of Test Data: ", df_test.shape)
            print("Test Features: ", test_features.shape)
            print("Test Labels: ", test_labels.shape)
        return test_features, test_labels, df_test
    
    def _feature_correlation(self, data_frame = None, show_fig = False):
        corr = data_frame.corr()
        sns.heatmap(corr, square=True, annot=False, cmap="YlGnBu")
        plt.title("Feature Correlation")
        plt.tight_layout()
        if show_fig:
            plt.show()
        plt.savefig('Feature_correlation.jpg')

    def _train_val_split(self):
        X_train, X_val, y_train, y_val = train_test_split(self.train_features, self.train_labels, test_size=self.validation_size, random_state = self.random_state)
        if self.verbose:
            print(f"Number of Training Features: {len(X_train)}\tNumber of Training Labels: {len(y_train)}")
            print(f"Number of Validation Features: {len(X_val)}\tNumber of Validation Labels: {len(y_val)}")
        return X_train, y_train, X_val, y_val
    
    def select_model(self):
        if self.model_name == 'mnb':
            self.clf = MultinomialNB()

        elif self.model_name == 'decision_tree':
            criterion = 'entropy'
            self.clf = DecisionTreeClassifier(criterion=criterion)

        elif self.model_name == 'random_forest':
            n_estimators = 10
            self.clf = RandomForestClassifier(n_estimators=n_estimators)

        elif self.model_name == 'gradient_boost':
            n_estimators = 150
            criterion = 'friedman_mse'
            self.clf = GradientBoostingClassifier(n_estimators=n_estimators, criterion=criterion)

        return self.clf

    def train_model(self):
        X_train, y_train, X_val, y_val = self._train_val_split()
        classifier = self.select_model()
        classifier = classifier.fit(X_train, y_train)
        confidence = classifier.score(X_val, y_val)
        y_pred = classifier.predict(X_val)
        accuracy = accuracy_score(y_val, y_pred)
        conf_mat = confusion_matrix(y_val, y_pred)
        clf_report = classification_report(y_val, y_pred)
        score = cross_val_score(classifier, X_val, y_val, cv=3)

        if self.verbose:
            print("\nTraining Accuracy: ", confidence)
            print("\nValidation Prediction: ", y_pred)
            print("\nValidation Accuracy: ", accuracy)
            print("Validation Confusion Matrix: \n", conf_mat)
            print("\nCross Validation Score: \n", score)
            print("\nClassification Report: \n", clf_report)

        dump(classifier, str(self.model_save_path + self.model_name + ".joblib"))

    def make_prediction(self, saved_madel_name = None, test_data = None):
        try:
            clf = load(str(self.model_save_path + saved_madel_name + ".joblib"))
        except Exception:
            print("Model not found")

        if test_data is not None:
            result = clf.predict(test_data)
            return result
        else:
            result = clf.predict(self.test_features)
        accuracy = accuracy_score(self.test_labels, result)
        clf_report = classification_report(self.test_labels, result)
        return accuracy, clf_report
    
if __name__ == "__main__":
    current_model_name = 'random_forest'
    dp = DiseasePrediction(model_name=current_model_name)
    dp.train_model()
    test_accuracy, classification_report = dp.make_prediction(saved_madel_name=current_model_name)
    print("Model Test Accuracy: ", test_accuracy)
    print("Test Data Classification Report: \n", classification_report)